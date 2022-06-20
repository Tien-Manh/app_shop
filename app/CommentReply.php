<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $table = 'comments_reply';
    public $fillable = ['comment_id', 'user_id', 'product_id', 'reply_content', 'created_at'];
}
