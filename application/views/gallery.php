Siia tuleb siis basic galerii alguses.

<img src="/uploads/Swedistan.png" alt="Swedistan"> 

$this->load->database();  


$query = $this->db->query("'SELECT title, description, location FROM pictures'");

foreach ($query->result() as $row)
{
   echo $row->title;
   echo $row->name;
   echo $row->body;
}