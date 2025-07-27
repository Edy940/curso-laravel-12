<div>
   <h2>Cadastrar Curso</h2>
   <form action="{{ route('courses.store') }}" method="POST">
       @csrf
       @method('POST')
       <label>Nome do Curso:</label>
         <input type="text" name="name" id="name" placeholder="Digite o nome do curso" required><br><br>

         <button type="submit">Cadastrar</button>
   </form>                    
</div>
