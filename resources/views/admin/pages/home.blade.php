@extends('admin.partial.template')

@include('admin.settings.sidebar')

@section('section')
  <div class="title">
    <h3 class="font-weight-bold">Pages</h3>
    <p class="lead">Set custom page content</p>
  </div>
  <hr>
  {{-- <p class="alert alert-warning">
    <strong>Feature Unavailable:</strong> This feature will be released in a future version.
  </p> --}}
  @if($pages->count())
  <div class="table-responsive">
    <table class="table">
      <thead class="bg-light">
        <tr class="text-center">
          <th scope="col" class="border-0" width="5%">
            <span>ID</span> 
          </th>
          <th scope="col" class="border-0" width="50%">
            <span>Slug</span>
          </th>
          <th scope="col" class="border-0" width="15%">
            <span>Active</span>
          </th>
          <th scope="col" class="border-0" width="30%">
            <span>Updated</span>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($pages as $page)
        <tr class="font-weight-bold text-center page-row">
          <th scope="row">
            <a href="{{$page->editUrl()}}">{{$page->id}}</a>
          </th>
          <td>{{$page->slug}}</td>
          <td>{{$page->active ? 'active':'inactive'}}</td>
          <td>{{$page->updated_at->diffForHumans(null, true, true, true)}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center mt-5 small">
    {{$pages->links()}}
  </div>
  <hr>
  <div class="btn-group">
    <form class="form-inline mr-1" method="post" action="/i/admin/settings/pages/create">
      @csrf
      <input type="hidden" name="page" value="about">
      <button type="submit" class="btn btn-outline-secondary font-weight-bold">Create About Page</button>
    </form>
    <form class="form-inline mr-1" method="post" action="/i/admin/settings/pages/create">
      @csrf
      <input type="hidden" name="page" value="privacy">
      <button type="submit" class="btn btn-outline-secondary font-weight-bold">Create Privacy Page</button>
    </form>
    <form class="form-inline" method="post" action="/i/admin/settings/pages/create">
      @csrf
      <input type="hidden" name="page" value="terms">
      <button type="submit" class="btn btn-outline-secondary font-weight-bold">Create Terms Page</button>
    </form>
  </div>
  @else 
  <div class="card bg-light shadow-none rounded-0">
    <div class="card-body text-center">
      <p class="lead text-muted font-weight-bold py-5 mb-0">No custom pages found</p>
    </div>
  </div>
  <hr>
  <div class="btn-group">
    <form class="form-inline mr-1" method="post" action="/i/admin/settings/pages/create">
      @csrf
      <input type="hidden" name="page" value="about">
      <button type="submit" class="btn btn-outline-secondary font-weight-bold">Create About Page</button>
    </form>
    <form class="form-inline mr-1" method="post" action="/i/admin/settings/pages/create">
      @csrf
      <input type="hidden" name="page" value="privacy">
      <button type="submit" class="btn btn-outline-secondary font-weight-bold">Create Privacy Page</button>
    </form>
    <form class="form-inline" method="post" action="/i/admin/settings/pages/create">
      @csrf
      <input type="hidden" name="page" value="terms">
      <button type="submit" class="btn btn-outline-secondary font-weight-bold">Create Terms Page</button>
    </form>
  </div>
  @endif
@endsection