<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Komentar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>{{ $post->id }} - {{ $post->title }} </h2> 
                                       
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title">Special title treatment</h5>
                                      <p class="card-text"><p> {{ $post->content }}</p> </p>
                                      <a href="#" class="btn btn-primary">comment</a>
                                    </div>
                                  </div>

                            </div>
                        </div>    
                        <div class="form-group">                            
                            <div class="form-group">
                                <label class="font-weight-bold">ID</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="post_id" value="{{ $post->id }} " readonly>
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">JUDUL</label>
                                    <input readonly type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }} " placeholder="Masukkan Judul Post">
                                
                                    <!-- error message untuk title -->
                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    
                                <div class="form-group">
                                    <label class="font-weight-bold">Isi KONTEN</label>
                                    <textarea readonly class="form-control @error('content') is-invalid @enderror" name="content" rows="5" >{{ $post->content }}</textarea>
                                    <!-- error message untuk content -->
                                    @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Daftar Komentar</label>
                                    @foreach($post->comments()->get() as $comment)
                                    <input class="form-control" type="text" name="datakomentar" value="{{ $comment->comment }}" readonly>
                                    @endforeach


                                </div>
                                
                                <div class="form-group">
                                    <label class="font-weight-bold">Tulis Komentar</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="comment" rows="5" placeholder="Masukkan komentar">
        
                                    
                                    </textarea>
                                
                                    <!-- error message untuk content -->
                                    @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>