<div class="form-group">
    <label for="exampleInputEmail1">Название категории</label>
    <input type="text" class="form-control" placeholder="Введите название" name="name" @if(isset($category->name)) value="{{ $category->name }}" @endif required>
</div>