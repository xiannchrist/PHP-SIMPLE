
<section class="panel">
    <?php if ($successMessage !== ''): ?>
        <div class="alert"><?php echo htmlspecialchars($successMessage, ENT_QUOTES, 'UTF-8'); ?></div>
    <?php endif; ?>

    <?php if ($errors !== []): ?>
        <div class="errors">
            <strong>Please fix the following fields:</strong>
            <ul>
                <?php foreach ($errors as $message): ?>
                    <li><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars(rtrim($basePath, '/'), ENT_QUOTES, 'UTF-8'); ?>/index.php?action=store" class="form-grid">
        <label>
            First Name
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($old['first_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label>
            Middle Name
            <input type="text" name="middle_name" value="<?php echo htmlspecialchars($old['middle_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label>
            Last Name
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($old['last_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label>
            Age
            <input type="number" name="age" min="1" max="120" value="<?php echo htmlspecialchars($old['age'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label>
            Gender
            <select name="gender" required>
                <option value="">Select gender</option>
                <?php foreach (['Male', 'Female', 'Prefer not to say'] as $gender): ?>
                    <option value="<?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $old['gender'] === $gender ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>
            Email
            <input type="email" name="email" value="<?php echo htmlspecialchars($old['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <label class="full">
            Address
            <textarea name="address" required><?php echo htmlspecialchars($old['address'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        </label>
        <label>
            Contact Number
            <input type="tel" name="contact_number" value="<?php echo htmlspecialchars($old['contact_number'], ENT_QUOTES, 'UTF-8'); ?>" required>
        </label>
        <div class="actions full">
            <button type="submit">Save Record</button>
            <button type="reset" class="button-secondary">Clear</button>
        </div>
    </form>
</section>

<section class="panel">
    <h2>List of Registered Person</h2>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($people === []): ?>
                    <tr>
                        <td colspan="8">No records yet. Submit the form to add your first registered person.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($people as $person): ?>
                        <tr>
                            <td><?php echo (int) $person['id']; ?></td>
                            <td><?php echo htmlspecialchars($person['first_name'] . ' ' . $person['middle_name'] . ' ' . $person['last_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo (int) $person['age']; ?></td>
                            <td><?php echo htmlspecialchars($person['gender'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($person['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($person['address'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($person['contact_number'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($person['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
