<?php
declare(strict_types=1);

namespace magicmaster05111\Yii2LdapAuth;

use magicmaster05111\Yii2LdapAuth\Exception\Yii2LdapAuthException;
use Yii;
use yii\rbac\Assignment;
use yii\rbac\BaseManager;
use yii\rbac\Item;

/**
 * LdapManager represents an authorization manager that stores authorization information in Active Directory.
 */
class LdapManager extends BaseManager
{
    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    protected function addItem($item): bool
    {
        throw new Yii2LdapAuthException('Adding item is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    protected function addRule($rule): bool
    {
        throw new Yii2LdapAuthException('Adding rule is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    protected function getItem($name): ?Item
    {
        throw new Yii2LdapAuthException('Getting item is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    protected function getItems($type): array
    {
        throw new Yii2LdapAuthException('Getting items is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    protected function removeItem($item): bool
    {
        throw new Yii2LdapAuthException('Removing item is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    protected function removeRule($rule): bool
    {
        throw new Yii2LdapAuthException('Removing rule is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    protected function updateItem($name, $item): bool
    {
        throw new Yii2LdapAuthException('Updating item is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    protected function updateRule($name, $rule): bool
    {
        throw new Yii2LdapAuthException('Updating rule is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function addChild($parent, $child): bool
    {
        throw new Yii2LdapAuthException('Adding child is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function assign($role, $userId): Assignment
    {
        throw new Yii2LdapAuthException('Assigning role is not supported');
    }

    /**
     * {@inheritdoc}
     */
    public function canAddChild($parent, $child): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function checkAccess($userId, $permissionName, $params = []): bool
    {
        return in_array($permissionName, Yii::$app->user->identity->getGroups());
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getAssignment($roleName, $userId): Assignment
    {
        throw new Yii2LdapAuthException('Getting assignment is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getAssignments($userId): array
    {
        throw new Yii2LdapAuthException('Getting assignments is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getChildRoles($roleName): array
    {
        throw new Yii2LdapAuthException('Getting child roles is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getChildren($name): array
    {
        throw new Yii2LdapAuthException('Getting children is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getPermissionsByRole($roleName): array
    {
        throw new Yii2LdapAuthException('Getting perissions by role is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getPermissionsByUser($userId): array
    {
        throw new Yii2LdapAuthException('Getting permissions by user is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getRolesByUser($userId): array
    {
        throw new Yii2LdapAuthException('Getting roles by user is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getRule($name): void
    {
        throw new Yii2LdapAuthException('Getting rule is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getRules(): array
    {
        throw new Yii2LdapAuthException('Getting rules is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function getUserIdsByRole($roleName): array
    {
        throw new Yii2LdapAuthException('Getting user ids by role is not supported');
    }

    /**
     * {@inheritdoc}
     */
    public function hasChild($parent, $child): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function removeAll(): void
    {
        throw new Yii2LdapAuthException('Removing all is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function removeAllAssignments(): void
    {
        throw new Yii2LdapAuthException('Removing all assignments is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function removeAllPermissions(): void
    {
        throw new Yii2LdapAuthException('Removing all permissions is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function removeAllRoles(): void
    {
        throw new Yii2LdapAuthException('Removing all roles is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function removeAllRules(): void
    {
        throw new Yii2LdapAuthException('Removing all rules is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function removeChild($parent, $child): bool
    {
        throw new Yii2LdapAuthException('Removing child is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function removeChildren($parent): bool
    {
        throw new Yii2LdapAuthException('Removing children is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function revoke($role, $userId): bool
    {
        throw new Yii2LdapAuthException('Revoking is not supported');
    }

    /**
     * {@inheritdoc}
     * @throws Yii2LdapAuthException
     */
    public function revokeAll($userId): bool
    {
        throw new Yii2LdapAuthException('Revoking all is not supported');
    }
}
