<?php

namespace App\SanitaryResidence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'indications', 'observations', 'patient_id', 'room_id', 'prevision',
        'entry_criteria', 'prevision', 'responsible_family_member', 'relationship', 'doctor', 'diagnostic',
        'morbid_history', 'length_of_stay', 'onset_on_symptoms', 'end_of_symptoms',
        'allergies', 'commonly_used_drugs',
        'healthcare_centre', 'influenza_vaccinated', 'covid_exit_test', 'released_cause',
        'status', 'real_to'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['from','to','deleted_at'];


    public function patient() {
        return $this->belongsTo('App\Patient');
    }

    public function room() {
        return $this->belongsTo('App\SanitaryResidence\Room');
    }

    public function vitalSigns() {
        return $this->hasMany('App\SanitaryResidence\VitalSign');
    }

    public function indicaciones() {
        return $this->hasMany('App\SanitaryResidence\Indication');
    }

    public function evolutions() {
        return $this->hasMany('App\SanitaryResidence\Evolution')->orderBy('created_at');
    }


}
