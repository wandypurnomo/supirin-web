@extends("layouts.layout")

@push("contents")
    {!! Widget::run('main_navigation_widget') !!}
    {!! Widget::run('home_greetings_widget') !!}
    {!! Widget::run('home_advantages_widget') !!}
    {!! Widget::run('home_how_to_widget') !!}
    {!! Widget::run('home_wise_word_widget') !!}
    {!! Widget::run('home_statistics_widget') !!}
    {!! Widget::run('home_testimonials_widget') !!}
    {!! Widget::run('home_footer_widget') !!}
@endpush
