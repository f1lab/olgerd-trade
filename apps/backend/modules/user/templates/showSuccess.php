<?php slot('title', $sf_guard_user) ?>

<h1 class="page-header">
  <?php echo $sf_guard_user ?>
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('user/edit?id='.$sf_guard_user->getId()) ?>" class="btn btn-primary">Редактировать</a>
  </div>
  <div class="btn-group">
    <a href="<?php echo url_for('user/index') ?>" class="btn">Назад к списку</a>
  </div>
</div>

<table class="table table-condensed table-bordered">
  <tbody>
    <tr>
      <th scope="row" class="span3">Id:</th>
      <td><?php echo $sf_guard_user->getId() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">First name:</th>
      <td><?php echo $sf_guard_user->getFirstName() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Last name:</th>
      <td><?php echo $sf_guard_user->getLastName() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Email address:</th>
      <td><?php echo $sf_guard_user->getEmailAddress() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Username:</th>
      <td><?php echo $sf_guard_user->getUsername() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Is active:</th>
      <td><?php echo $sf_guard_user->getIsActive() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Is super admin:</th>
      <td><?php echo $sf_guard_user->getIsSuperAdmin() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Last login:</th>
      <td><?php echo $sf_guard_user->getLastLogin() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Created at:</th>
      <td><?php echo $sf_guard_user->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th scope="row" class="span3">Updated at:</th>
      <td><?php echo $sf_guard_user->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>
