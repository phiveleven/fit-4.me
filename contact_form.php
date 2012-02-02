<?
/*
 * Template Name: Contact Form
 */
$errors = array();
if ($post = validate($_POST)){
	$to = 'cruland@gmail.com';
	$contact =
	  $post['phone']  ? ' ('.$post['phone'].')' : '';
	$subject = '[Fit-4me] consultation for '.$post['full_name'].$contact;
	$body = "Name: ${post['full_name']}\n";
	$body .= "Zip: ${post['zipcode']}\n";
	$body .= "Email: ${post['email']}\n";
	$body .= "Phone: ${post['phone']}";
	$headers = "From: Fit-4me <$to> \n Reply-To: ${post['email']}";
	
	mail($to, $subject, $body, $headers);
	
	header('HTTP/1.1 204 No Content');
  exit;
	
	
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	header('HTTP/1.1 400 Bad Request');
	header('Cache-Control: no-cache, must-revalidate');
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
  header('Content-type: application/json');
	echo json_encode($errors);
	exit;
}

function validate($post){
	if ($_SERVER['REQUEST_METHOD'] != 'POST') return false;
	if ($post['comments'] != '') return false;
	
	global $errors;
	
	$name = trim($post['full_name']);
	if ($name === '') {
		array_push($errors, array('full_name' => 'Please enter your full name'));
		return false;
	}
	
	$email = trim($post['email']);
	if ($email != '' &&
	    !preg_match('/^[A-Z0-9._%-+]+@[A-Z0-9._%-]+.[A-Z]{2,4}$/i', $email)){
    array_push($errors, array('email' => 'Please enter a valid email address'));		
	  return false;
	}
	
	$phone = trim($post['phone']);
	if ($phone != '' &&
	    !preg_match('/^(\D*\d){10,13}$/', $phone)){
		array_push($errors, array('phone' => 'Please enter a valid phone number'));
		return false;
	}
	
	if ($email === '' && $phone === '') {
		array_push($errors, array('contact' => 'Please enter your email or phone number'));
		return false;
	}
	
	$zip = trim($post['zipcode']);
	if ($zip === '' ||
	    !preg_match('/^\d{5}$/', $zip)){
		array_push($errors, array('zipcode' => 'Please enter a valid, 5-digit zip code'));
		return false;
	}
	
	return $post;
}