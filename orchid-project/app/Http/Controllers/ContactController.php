<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminContactMail;
use App\Mail\ClientConfirmationMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'name.required' => 'Full name is required',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'website.url' => 'Please enter a valid website URL',
            'message.required' => 'Message is required',
            'message.min' => 'Message must be at least 10 characters',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Please correct the errors in the form'
            ], 422);
        }

        try {
            // Получаем валидированные данные
            $validated = $validator->validated();
            
            // 1. Отправляем письмо админу
            Mail::to(config('mail.admin_email', config('mail.from.address')))
                ->send(new AdminContactMail($validated));
            
            // 2. Отправляем письмо-подтверждение клиенту
            Mail::to($validated['email'])
                ->send(new ClientConfirmationMail($validated));
            
            // Проверяем, были ли ошибки при отправке
            if (Mail::failures()) {
                throw new \Exception('Email sending failed');
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! We will contact you shortly.'
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while sending the message. Please try again later.'
            ], 500);
        }
    }
}