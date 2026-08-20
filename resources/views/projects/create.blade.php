<h1>créer un projets </h1>
<form action="{{route('projects.store')}}" method="POST">
@csrf 
<label>nom : </label><br>
<input type="text" name="name" ><br><br>
<label> description : </label><br>
<input type="text" name="description"><br><br>
<button type="submit" >Enregistrer</button>
</form>