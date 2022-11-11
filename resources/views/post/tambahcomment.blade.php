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
                        
                            <div class="row">
                            <div class="col">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h6> {{ $post->title }} </h6> 
                                        
                                    </div>
                                    <div class="card-body">
                                      
                                      <p class="card-text"><p> {!! $post->content !!}</p> </p>
                                      
                                    </div>
                                  </div>

                            </div>
                        </div>    
                                                                      
             
                        {{-- ini baris komentar --}}
                                <div class="container" >
                                    <div class="row">
                                        <div class="col">
                                            @foreach($post->comments()->get() as $comment)
                                           
                                            
                                         

                                              <div class="card mb-1">
                                                <div class="card-body .bg-secondary">
                                                    {{ $comment->comment }}
                                                </div>
                                              </div>
                                            @endforeach
                                        </div>
                                    </div>
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