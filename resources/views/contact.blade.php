@extends("layouts.layout")

@push("contents")
    {!! Widget::run('main_navigation_widget') !!}
    {!! Widget::run('contact_greetings_widget') !!}

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info justify-content-center">
                <div class="col-md-8">
                    <div class="row mb-5">
                        <div class="col-md-4 text-center py-4">
                            <div class="icon">
                                <span class="icon-map-o"></span>
                            </div>
                            <p><span>Address:</span> Jalan Kaliurang Km 8,5 Dayu, Sleman, Yogyakarta</p>
                        </div>
                        <div class="col-md-4 text-center border-height py-4">
                            <div class="icon">
                                <span class="icon-mobile-phone"></span>
                            </div>
                            <p><span>Phone:</span> <a href="tel://1234567920">+62 878 7672 8998</a></p>
                        </div>
                        <div class="col-md-4 text-center py-4">
                            <div class="icon">
                                <span class="icon-envelope-o"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">supirin@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row block-9 justify-content-center mb-5">
                <div class="col-md-8 mb-md-5">
                    <h2 class="text-center">Jika ada pertanyaan <br>tolong tulis dan isi kolom dibawah ini</h2>
                    {!! Form::open(["class"=>"bg-light p-5 contact-form"]) !!}
                    <div class="form-group">
                        {!! Form::text("name",null,["class"=>"form-control","placeholder"=>"Nama","required"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::email("email",null,["class"=>"form-control","placeholder"=>"Email","required"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text("subject",null,["class"=>"form-control","placeholder"=>"Subyek","required"]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea("message",null,["class"=>"form-control","placeholder"=>"Pesan","rows"=>"7","required"]) !!}
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>

    {!! Widget::run('home_footer_widget') !!}
@endpush
