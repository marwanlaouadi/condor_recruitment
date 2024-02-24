<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Company;
use App\Models\Candidate;
use App\Models\Messenger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MessengerUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'candidate_id',
        'job_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class)->select('id','user_id','logo')->with('user:id,name,username');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class)->select('id','user_id', 'title','photo','profession_id')->with('user:id,name,username');
        // return $this->belongsTo(Candidate::class)->select('id','user_id', 'title','photo','profession_id')->with('user:id,name,username','profession.translations:id,profession_id,name,locale');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function messages()
    {
        return $this->hasMany(Messenger::class);
    }
}
