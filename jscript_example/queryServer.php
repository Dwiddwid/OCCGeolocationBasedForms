<?php
  // This takes the data in "submission" and reverses it, just as
  // an example (it could look up in a database, return score, etc.)
  // Returning multiple values could be done in an encoded string
  $submission = stripslashes(trim($_REQUEST["submission"]));
  if (strlen($submission)==0)
        print "Nothing submitted.";
  else
  {
        $reverse = "";
        for ($i = strlen($submission)-1; $i >= 0; $i--)
        {
                $reverse .= $submission[$i];
        }
        print $reverse;
  }
?>

