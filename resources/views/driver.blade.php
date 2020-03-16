@extends("layouts.layout")

@push("contents")
    {!! Widget::run('main_navigation_widget') !!}
    {!! Widget::run('driver_greetings_widget') !!}

    <section class="ftco-section ftco-agent">
        <div class="container">
            <div class="row">
                @foreach($drivers as $driver)
                    {!! Widget::run('single_driver_grid_widget',['name'=>$driver->metadata['name'],'image'=>$driver->getFirstMediaUrl('profile_pictures','profile_picture'),'experience'=>$driver->metadata['experience']]) !!}
                @endforeach
            </div>
        </div>
    </section>

    <div class="d-flex justify-content-center">
        {!! $drivers->render() !!}
    </div>

    {!! Widget::run('home_footer_widget') !!}
@endpush
