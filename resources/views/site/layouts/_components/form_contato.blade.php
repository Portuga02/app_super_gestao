    {{ $slot }}
    <form action={{ route('site.contatos') }} method="POST">
        @csrf
        <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
        @if ($errors->has('nome'))
            {{ $errors->first('nome') }}
        @endif()
        <br>
        <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
        @if ($errors->has('telefone'))
            {{ $errors->first('telefone') }}
        @endif()
        <br>
        <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
        @if ($errors->has('email'))
            {{ $errors->first('email') }}
        @endif
        <br>

        <select name="motivo_contatos_id" class="borda-preta">

            <option value="">Qual o motivo do contato?</option>
            @foreach ($motivo_contatos as $key => $motivo_contato)
                <option
                    value="{{ $motivo_contato->id }}"{{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                    {{ $motivo_contato->motivo_contato }}</option>
            @endforeach

        </select>
        @if ($errors->has('motivo_contatos_id'))
            {{ $errors->first('motivo_contatos_id') }}
        @endif
        <br>

        <textarea name="mensagem" class="borda-preta" placeholder="digite aqui sua mensagem"> 
           
             {{ old('mensagem') != '' ? old('mensagem') != '' : 'Preencha aqui sua mensagem' }} 
                
       </textarea>
        @if ($errors->has('mensagem'))
            {{ $errors->first('mensagem') }}
        @endif

        <br>
        <button type="submit" class="borda-preta">ENVIAR</button>
    </form>
    {{-- @if ($errors->any())
        <div style="position: center; top:0px; left:0px; width:100%; background:rgb(230, 185, 185);">

            @foreach ($errors->all() as $erro)
                {{ $erro }} <br>
            @endforeach

        </div>
    @endif --}}
