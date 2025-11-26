<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ContactService
{
    /**
     * Get all contacts paginated.
     *
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllPaginated(int $perPage = 20): LengthAwarePaginator
    {
        return Contact::latest()->paginate($perPage);
    }

    /**
     * Get recent contacts.
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRecent(int $limit = 5): Collection
    {
        return Contact::latest()->limit($limit)->get();
    }

    /**
     * Find contact by ID.
     *
     * @param int $id
     * @return \App\Models\Contact
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findById(int $id): Contact
    {
        return Contact::findOrFail($id);
    }

    /**
     * Create a new contact.
     *
     * @param array $data
     * @return \App\Models\Contact
     */
    public function create(array $data): Contact
    {
        return Contact::create($data);
    }

    /**
     * Delete a contact.
     *
     * @param \App\Models\Contact $contact
     * @return bool
     */
    public function delete(Contact $contact): bool
    {
        return $contact->delete();
    }

    /**
     * Check if email has recent submission.
     *
     * @param string $email
     * @param int $withinMinutes
     * @return bool
     */
    public function hasRecentSubmission(string $email, int $withinMinutes = 1): bool
    {
        return Contact::where('email', $email)
            ->where('created_at', '>=', now()->subMinutes($withinMinutes))
            ->exists();
    }

    /**
     * Get total contact count.
     *
     * @return int
     */
    public function count(): int
    {
        return Contact::count();
    }
}
