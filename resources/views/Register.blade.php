@extends('layouts.head')
<!-- no additional media querie or css is required -->

<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
            <p class="text-center">Registrasi Diri Anda</p>
                <div class="card">
                    <div class="card-body">

                        <form action="/daftar" method="POST">
                        @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Nama">
                            </div>                            
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="username" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                                <a href="/auth">
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </a>
                                <button type="submit" class="btn btn-primary">Submit</button>                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>