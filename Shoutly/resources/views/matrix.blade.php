<!-- resources/views/matrix.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoutly - Laravel</title>
</head>
<body>
    <table>
        @foreach ($matrix as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{{ $cell }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>
