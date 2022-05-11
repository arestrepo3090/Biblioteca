<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autpres</title>

    <style>
        .page-brake{
            page-break-after: always;
        }

        @page{
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body{
            margin: 3cm 2cm 2cm;
        }

        header{
            position: fixed;
            margin: 3cm 2cm 2cm;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer{
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            color: #3399ff;
        }

        #tblAutores {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tblAutores td, #tblAutores th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tblAutores tr:nth-child(even){background-color: #f2f2f2;}

        #tblAutores tr:hover {background-color: #ddd;}

        #tblAutores th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #9da5b1;
            color: white;
        }
    </style>
</head>
<body>
<h1>Autores registrados</h1>
    <div class="row">
        <div class="col">
            <table id="tblAutores">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Nacionalidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $value)
                        <tr>
                            <td>{{$value->nombre}}</td>
                            <td>{{$value->nacionalidad}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/php">
        if(isset($pdf)){
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270,730, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>
</body>
</html>
