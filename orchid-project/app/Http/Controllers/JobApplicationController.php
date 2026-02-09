<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\AdminJobApplicationMail;
use App\Mail\ClientJobConfirmationMail;

class JobApplicationController extends Controller
{
    public function send(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'job_title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'why_apply' => 'required|string|min:50|max:2000',
            'proud_project' => 'nullable|string|max:2000',
            'portfolio' => 'required|string|max:1000',
            'salary_expectations' => 'required|string|max:1000',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB максимум
        ], [
            'job_title.required' => 'Job title is required',
            'name.required' => 'Your name is required',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'why_apply.required' => 'Please tell us why you want to apply',
            'why_apply.min' => 'Please provide more details (at least 50 characters)',
            'portfolio.required' => 'Please share your portfolio links',
            'salary_expectations.required' => 'Please share your salary expectations',
            'cv.required' => 'Please upload your CV',
            'cv.file' => 'Please upload a valid file',
            'cv.mimes' => 'CV must be a PDF, DOC or DOCX file',
            'cv.max' => 'CV file size should not exceed 5MB',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Please correct the errors in the form'
            ], 422);
        }

        try {
            // Сохраняем файл CV
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv')->store('job_applications/cv', 'public');
                $cvName = $request->file('cv')->getClientOriginalName();
                $cvSize = $request->file('cv')->getSize();
            }

            // Подготавливаем данные
            $applicationData = [
                'job_title' => $request->input('job_title'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'why_apply' => $request->input('why_apply'),
                'proud_project' => $request->input('proud_project'),
                'portfolio' => $request->input('portfolio'),
                'salary_expectations' => $request->input('salary_expectations'),
                'cv_path' => $cvPath ?? null,
                'cv_name' => $cvName ?? null,
                'cv_size' => $cvSize ?? 0,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'applied_at' => now(),
            ];

            // 1. Отправляем письмо админу с вложением
            Mail::to(config('mail.admin_email', config('mail.from.address')))
                ->send(new AdminJobApplicationMail($applicationData));
            
            // 2. Отправляем письмо-подтверждение кандидату
            Mail::to($request->input('email'))
                ->send(new ClientJobConfirmationMail($applicationData));
            
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your application! We will review it and contact you shortly.'
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Job application error: ' . $e->getMessage());
            
            // Удаляем файл если он был загружен, но произошла ошибка
            if (isset($cvPath) && Storage::disk('public')->exists($cvPath)) {
                Storage::disk('public')->delete($cvPath);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your application. Please try again later.'
            ], 500);
        }
    }
}