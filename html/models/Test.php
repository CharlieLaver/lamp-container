<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;

class Test extends Model {

    ## Database table that connects to the model.
    protected $table = "test";

    ## The attributes that are mass assignable.
    protected $fillable = [
        "test"
   ];

 }