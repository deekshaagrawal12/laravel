<h1>List of Country</h1>
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
.pagination{
  display:flex;
}
ul.pagination {
    list-style-type: none;
}
li.page-item {
    margin-left: 10px;
}
</style>
<table border='1' id="table1">
    <tr>
        <th>Country Code</th>
        <th>Country Name</th>
    </tr>
    @foreach($data as $country)
    <tr>
      <td><?php echo $country->countryCode ;?></td>
      <td><a href="/detail/{{$country->countryCode}}"><?php echo $country->name ;?></a></td>       
    </tr>
    @endforeach
</table>
<div class="pagination">
{!! $data->links() !!}
  </div>