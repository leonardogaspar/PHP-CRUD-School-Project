<?php if (!empty($success_message)): ?>
  <div class="message success">
    <?php echo $success_message; ?>
  </div>
<?php endif; ?>
<?php if (!empty($error_message)): ?>
  <div class="message error">
    <?php echo $error_message; ?>
  </div>
<?php endif; ?>