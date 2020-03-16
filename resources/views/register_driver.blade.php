@extends("layouts.layout")

@push("contents")
    {!! Widget::run('main_navigation_widget') !!}
    {!! Widget::run('register_greetings_widget') !!}

    <div class="row block-9 justify-content-center mb-5 mt-5">
        <div class="col-md-8 mb-md-5">
            <h2 class="text-center">Pendaftaran Pengemudi <br>Masukkan Info Kamu Untuk Memulai !!</h2>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            @endif
            {!! Form::open(['class'=>'bg-light p-5 contact-form','files'=>true]) !!}
            <div class="form-group">
                {!! Form::number('nik',null,['class'=>'form-control','placeholder'=>'NIK']) !!}
            </div>
            <div class="form-group">
                {!! Form::select('bank',$banks,null,['class'=>'form-control','placeholder'=>'Pilih Bank']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('account_name',null,['class'=>'form-control','placeholder'=>'Nama Akun Bank']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('account_number',null,['class'=>'form-control','placeholder'=>'Nomor Rekening']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nama']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('dob',null,['class'=>'form-control','placeholder'=>'Tanggal Lahir','id'=>'dob']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Nomor Handphone']) !!}
            </div>
            <div class="form-group">
                {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
            </div>
            <div class="form-group">
                {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
            </div>
            <div class="form-group">
                {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Ulangi Password']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('experience',null,['class'=>'form-control','placeholder'=>'Pengalaman']) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="button" id="btn-upload">Unggah Foto</button>
                <span class="filename" id="filename-container">Belum ada foto.</span>
                <input class="d-none" type="file" name="file_foto" id="file-foto">
            </div>
            <div class="form-group">
                <input type="submit" value="Daftar" class="btn btn-primary btn-block py-3 px-5">
            </div>
            {!! Form::close() !!}

        </div>
    </div>

    {!! Widget::run('home_footer_widget') !!}
@endpush

@push('scripts')
    <script>
        $(function () {
            $("#dob").focus(function () {
                $(this).attr("type", "date");
            }).blur(function () {
                $(this).attr("type", "text");
            });
        })
    </script>

    <script>
        $(function () {
            let btnUpload = $("#btn-upload");
            let filenameContainer = $("#filename-container");
            let fileFoto = $("#file-foto");

            btnUpload.click(function () {
                fileFoto.trigger('click');
            });

            fileFoto.change(function () {
                let fullPath = $(this).val();
                if (fullPath) {
                    let startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                    let filename = fullPath.substring(startIndex);
                    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                        filename = filename.substring(1);
                    }
                    filenameContainer.text(filename);
                }
            });
        });
    </script>
@endpush
