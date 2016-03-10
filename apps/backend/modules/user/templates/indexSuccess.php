<?php slot('title', 'Пользователи') ?>

<h1 class="page-header">
  Пользователи
</h1>

<div class="btn-toolbar">
  <div class="btn-group">
    <a href="<?php echo url_for('user/new') ?>" class="btn btn-primary">Добавить</a>
  </div>
</div>

<table class="table table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Email address</th>
      <th>Username</th>
      <th>Is active</th>
      <th>Is super admin</th>
    </tr>
  </thead>
  <tbody><?php foreach ($sf_guard_users as $sf_guard_user): ?>
    <tr>
      <td><a href="<?php echo url_for('user/show?id='.$sf_guard_user->getId()) ?>"><?php echo $sf_guard_user->getId() ?></a></td>
      <td><?php echo $sf_guard_user->getFirstName() ?></td>
      <td><?php echo $sf_guard_user->getLastName() ?></td>
      <td><?php echo $sf_guard_user->getEmailAddress() ?></td>
      <td><?php echo $sf_guard_user->getUsername() ?></td>
      <td><span class="icon icon-<?php echo $sf_guard_user->getIsActive() ? 'ok' : 'remove' ?>"></span></td>
      <td><span class="icon icon-<?php echo $sf_guard_user->getIsSuperAdmin() ? 'ok' : 'remove' ?>"></span></td>
    </tr>
  <?php endforeach; ?></tbody>
</table>
