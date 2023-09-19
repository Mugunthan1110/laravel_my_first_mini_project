@if(session('status'))
    <p style="background-color:green; padding:10px; border-radius:5px; margin:5px;
    text-align:center; color:white;">{{session('status')}}</p>

 @endif