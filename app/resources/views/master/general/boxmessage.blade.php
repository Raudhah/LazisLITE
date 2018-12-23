
    <?php if(!empty($message)){ ?>
        @if ($message['show'])

            <div class="alert alert-{{$message['type']}} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{$message['content']}}
            </div>
            
        @else
            <h1>Ooops. ada masalah...</h1> 
        @endif
    
    <?php } ?>


        @if ($errors->any())

            <div class="alert alert-error alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>
            

        @endif
    
    