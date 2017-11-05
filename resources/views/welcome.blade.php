@extends('layouts.master')
@section('maincontent')
{{ $data['latest_dayend_archive']->count()}}
@endsection