<?php use_helper('I18N'); ?>
<table>
    <tbody>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $contact->title; ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['lastname']->renderLabel() ?></th>
        <td>
          <?php echo $contact->lastname; ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['firstname']->renderLabel() ?></th>
        <td>
         <?php echo $contact->firstname; ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['phone']->renderLabel() ?></th>
        <td>
         <?php echo $contact->phone; ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $contact->email; ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['subject']->renderLabel() ?></th>
        <td>
         <?php echo $contact->country; ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comments']->renderLabel() ?></th>
        <td>
          <?php echo nl2br($contact->comments); ?>
        </td>
      </tr>
      <tr>
        <th>Provenance</th>
        <td>
          <?php echo $contact->referer; ?>
        </td>
      </tr>
      <tr>
        <th>Site</th>
        <td>
          <?php echo $contact->host; ?>
        </td>
      </tr>
      <tr>
        <th>Mots clés</th>
        <td>
          <?php echo $contact->keywords; ?>
        </td>
      </tr>
    </tbody>
  </table>