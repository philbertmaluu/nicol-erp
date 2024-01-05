@foreach($mergedShareHolders as $record)

<tr>
    <td>{{ isset($record['CSD']) ? $record['CSD'] : '' }}</td>
    <td>{{ isset($record['Name']) ? $record['Name'] : '' }}</td>
    <td>{{ isset($record['phone']) ? $record['phone'] : '' }}</td>
    <td>{{ isset($record['shares']) ? number_format($record['shares']) : '' }}</td>
</tr>

@endforeach