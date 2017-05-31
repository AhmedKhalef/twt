
  require('Pusher.php');

  $options = array(
    'cluster' => 'eu',
    'encrypted' => true
  );
  $pusher = new Pusher(
    'c3989958cbc885dabf98',
    '2e49191650477629950d',
    '332658',
    $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('my-channel', 'my-event', $data);

