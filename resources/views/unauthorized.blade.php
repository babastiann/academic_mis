@extends('layouts.index')

@section('content')
<div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-blod mb-3">Unauthorized Access</h3>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <p>You Are unauthorzied</p>
                    <a href="{{ rote('dashboard') }}" class="status">
                      Back to dasboard
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>

</script>
@endsection
