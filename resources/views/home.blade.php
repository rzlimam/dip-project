@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

    </section>
    <div>
        <h1>Hello, {{ Auth::user()->name }}!</h1>
    </div>

@endsection