@extends('layouts.head')
<!-- no additional media querie or css is required -->

<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
            <p class="text-center">Sikahkan Login</p>
                <div class="card">
                    <div class="card-body">
                        <form action="/login" method="POST" autocomplete="off">
                        @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" id="sendlogin" class="btn btn-primary">Login</button>
                                <a href="/register">
                                <button type="button" id="sendlogin" class="btn btn-success">Register</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>