@extends('layouts.appIn')


@section('appIn_css')
    <script src="https://cdn.tiny.cloud/1/i55zli5pnbddqd19ulg2vok38r2i2zrn77xaj1omc45x15fe/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')

@include('unit.topNav')

<div style="padding-top: 150px;">

    @include('unit.update.form')

</div>
@endsection

@section('appIn_js')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('js/repeater.js')}}"></script>

    <script>
        tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount directionality',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | ltr rtl',
        font_family_formats: 'Roboto=Roboto, sans-serif;'

        });
    </script>

    <script>
        $(function() {
            $('#associated_project').prop("disabled", true);
            $('#property_release').change(function(){
                if($('#property_release').val() == '1') {
                    $('#associated_project').prop("disabled", false);
                } else {
                    $('#associated_project').prop("disabled", true);
                }
            });
        });

        //meta titles
        var property_title = 60;
        $("#property_title").keyup(function()  {
            var length = $(this).val().length;
            var length = property_title-length;
            $('#property_title_chars').text(length);
        });

        //meta titles
        var meta_title_en_maxLenght = 60;
        $("#meta_title").keyup(function()  {
            var length = $(this).val().length;
            var length = meta_title_en_maxLenght-length;
            $('#meta_title_en_chars').text(length);
        });

        //meta keywords
        var meta_keywords_en_maxLenght = 255;
        $("#meta_keywords").keyup(function()  {
            var length = $(this).val().length;
            var length = meta_keywords_en_maxLenght-length;
            $('#meta_keywords_en_chars').text(length);
        });


        //meta description
        var meta_description_en_maxLenght = 155;
        $("#meta_description").keyup(function()  {
            var length = $(this).val().length;
            var length = meta_description_en_maxLenght-length;
            $('#meta_description_en_chars').text(length);
        });

    </script>
@endsection
