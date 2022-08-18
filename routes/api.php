<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SclassController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\StudentController;

Route::resource('class', SclassController::class);
Route::resource('section', SectionController::class);
Route::resource('subject', SubjectController::class);
Route::resource('student', StudentController::class);
