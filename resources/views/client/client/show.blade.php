@extends('layout.client')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-black"><b>{{ $title }}</b></div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <table class="table table-sm">
                                        <tr>
                                            <td>Client ID</td>
                                            <td>{{ $oauth_clients->_id }}</td>
                                        </tr>
                                        @if($user != null)
                                            <tr>
                                                <td>User</td>
                                                <td>{{ $user->nama['nama_depan'] }} {{ $user->nama['nama_belakang'] }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td>Redirect</td>
                                            <td>{{ $oauth_clients->redirect }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                @if($oauth_clients->revoked == true)
                                                    {{ "Blokir" }}
                                                @else
                                                    {{ "Active" }}
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-25">Secret Client</td>
                                            <td>
                                                <div id="hiddenText" style="display: none;">
                                                    <span id="copyText">{{ $oauth_clients->secret }}</span>
                                                    <span onclick="copyText()"> <i class="fa fa-clone" aria-hidden="true"></i></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button onclick="showText()" class="btn btn-sm btn-info">Show / Hide Secret Client</button>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
    <script>
        function copyText() {
            // Get the text element
            const text = document.getElementById("copyText");

            // Create a temporary element to hold the text
            const tempElement = document.createElement("textarea");
            tempElement.value = text.innerText;
            document.body.appendChild(tempElement);

            // Select the text
            tempElement.select();

            // Copy the text to the clipboard
            document.execCommand("copy");

            // Remove the temporary element
            document.body.removeChild(tempElement);

            // Alert the user
            alert("Text berhasil dicopy");
        }
        function showText() {

            const textElement = document.getElementById("hiddenText");
            if (textElement.style.display === "none") {
                textElement.style.display = "block";
            } else {
                textElement.style.display = "none";
            }



        }

    </script>
@endsection
