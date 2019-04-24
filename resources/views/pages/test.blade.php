@extends('layouts.app') 
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          <form>

          <div id="sections">
            <div class="section">
              <fieldset>
                  <legend>User</legend>

                  <p>
                      <label for="firstName">First Name:</label>
                      <input name="firstName[]" id="firstName" value="" type="text" />
                  </p>

                  <p>
                      <label for="lastName">Last Name:</label>
                      <input name="lastName[]" id="lastName" value="" type="text" />
                      <select name="as" id="df">
                        <option value="asd">q</option>
                        <option value="asd">d</option>
                        <option value="asd">x</option>
                      </select>
                  </p>

                  <p><a href="#" class='remove'>Remove Section</a></p>

              </fieldset>
            </div>
          </div>

          <p><a href="#" class='addsection'>Add Section</a></p>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
    <script>
      $(() => {
        let template = $('#sections .section:first').clone();
        let sectionsCount = 1;
        $('body').on('click', '.addsection', function() {
            sectionsCount++;
            var section = template.clone().find(':input').each((index, element) => {
                var newId = element.id + sectionsCount;
                $(element).prev().attr('for', newId);
                element.id = newId;
            }).end().appendTo('#sections');
            return false;
        });
        $('#sections').on('click', '.remove', function() {
            $(this).parent().fadeOut(300, function(){
                $(this).parent().parent().empty();
                return false;
            });
            return false;
        });
      })
    </script>
@endpush