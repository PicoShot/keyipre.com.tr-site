<?php
$data = file_get_contents('data.json');
$messages = json_decode($data, true);

if (isset($_GET['q'])) {
  $searchQuery = strtolower($_GET['q']);
  $filteredMessages = array_filter($messages, function ($message) use ($searchQuery) {
    return strpos(strtolower($message['mesaj']), $searchQuery) !== false;
  });
} else {
  $filteredMessages = $messages;
}

?>
<form method="get">
  <label for="q">Search messages:</label>
  <input type="text" id="q" name="q" value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>">
  <button type="submit">Search</button>
</form>

<?php
if (count($filteredMessages) > 0) {
  ?>
  <ul>
    <?php foreach ($filteredMessages as $message) { ?>
      <li>
        <strong><?php echo $message['name']; ?></strong> (<?php echo $message['email']; ?>):
        <?php echo $message['mesaj']; ?>
      </li>
    <?php } ?>
  </ul>
  <?php
} else {
  echo 'No messages found.';
}
?>
