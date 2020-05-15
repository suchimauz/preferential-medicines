<div class="form-group">
    <label for="exampleInputEmail1">Название лекарства</label>
    <input type="text" class="form-control" placeholder="Введите название" name="name" @if(isset($medicament)) value="{{ $medicament->name }}" @endif required>
</div>
<div class="form-group">
    <label>Категория лекарства</label>
    <select class="form-control" name="category_id" required @if(isset($medicament)) value="{{ $medicament->category_id }}" @endif>
        <option @if(!isset($medicament->category_id)) selected @endif value={{ null }}>Выберите категорию лекарства</option>
        @foreach ($categories as $category)
            <option 
                value="{{ $category->id }}"
                @if(isset($medicament->category_id))
                    @if($medicament->category_id == $category->id)
                        selected
                    @endif
                @endif
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Категория льготника</label>
    <select class="form-control" name="exempt_id" required @if(isset($medicament)) value="{{ $medicament->exempt_id }}" @endif>
        <option @if(!isset($medicament->category_id)) selected @endif value={{ null }}>Выберите категорию льготника</option>
        @foreach ($exempts as $exempt)
            <option 
                value="{{ $exempt->id }}"
                @if(isset($medicament->exempt_id))
                    @if($medicament->exempt_id == $exempt->id)
                        selected
                    @endif
                @endif
            >
                {{ $exempt->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Форма выпуска</label>
    <select class="form-control" name="release_id" required @if(isset($medicament)) value="{{ $medicament->release_id }}" @endif>
        <option @if(!isset($medicament->release_id)) selected @endif value={{ null }}>Выберите форму выпуска</option>
        @foreach ($releases as $release)
            <option 
                value="{{ $release->id }}"
                @if(isset($medicament->release_id))
                    @if($medicament->release_id == $release->id)
                        selected
                    @endif
                @endif
            >
                {{ $release->name }}
            </option>
        @endforeach
    </select>
</div>