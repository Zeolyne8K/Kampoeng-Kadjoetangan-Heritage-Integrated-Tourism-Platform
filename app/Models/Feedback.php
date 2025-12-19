<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /** @use HasFactory<\Database\Factories\FeedbackFactory> */
    use HasFactory;
    protected $table = 'feedbacks';
    protected $primaryKey = 'feedback_id';
    protected $fillable = [
        'feedback_sender_name',
        'feedback_sender_email',
        'feedback_label',
        'feedback_message_type',
        'feedback_sender_message',
    ];
}
