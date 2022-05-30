<h1>Country Details</h1>
<style>
#table1 {
  border-collapse: collapse;
  border: 1px solid black;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
#table2 {
  border-collapse: collapse;
  border: 1px solid black;
  width: 100%;
}
</style>
<table border='1' id="table1">
    <tr>
        <th>Country Name</th>
        <th>Country Region</th>
        <th>Country Code</th>
        <th>Borders</th>
    </tr>
    <tr>
        <td>{{$details['commonName']}}</td>
        <td>{{$details['region']}}</td>
        <td>{{$details['countryCode']}}</td>
        <td>{{$borders}}</td>
    </tr>
</table>
<br><br>
<h1>Next 4 Holidays in this year out of {{$totalHolidays}}</h1>
<table border='1' id="table2">
    <tr>
        <th>Holiday Name</th>
        <th>Holiday Date</th>
        <!-- <th>Launch Year</th> -->
    </tr>
    @for ($i=0;$i<=3;$i++)
    <tr>
        <td>{{$holidays[$i]['name']}}</td>
        <td>{{$holidays[$i]['date']}}</td>
        <!-- <td>{{$holidays[$i]['launchYear']}}</td> -->
    </tr>
    @endfor
</table>