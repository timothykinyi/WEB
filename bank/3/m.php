<script>updateNotificationCount(<?php  echo getNotificationCount(); ?>);
    function updateNotificationCount(count) 
        {
        const counterElement = document.getElementById("notificationCounter");
        counterElement.textContent = count;
        counterElement.style.display = count > 0 ? 'block' : 'none';
        }
</script>

<?php
function getNotificationCount() 
{
    $counter=0;
    $counter2=10;
    include "notificationdisp.php";
    if ($nresult->num_rows > 0)
    { while ($row = $viewAccountDetailsresult->fetch_assoc()) { }}
    
}
?>

