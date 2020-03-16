@extends("layouts.layout")

@push("contents")
    {!! Widget::run('main_navigation_widget') !!}
    {!! Widget::run('about_greetings_widget') !!}
    {!! Widget::run('home_wise_word_widget') !!}
    {!! Widget::run('home_statistics_widget') !!}
    {!! Widget::run('home_testimonials_widget') !!}
    {!! Widget::run('home_footer_widget') !!}
@endpush
