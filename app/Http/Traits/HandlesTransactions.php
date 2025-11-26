<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;

trait HandlesTransactions
{
    /**
     * Execute a database transaction with error handling.
     *
     * @param callable $callback The transaction logic
     * @param string $successMessage The success flash message
     * @param string $successRoute The route to redirect on success
     * @param string $errorContext The context for error logging
     * @param array $errorData Additional data for error logging
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function handleTransaction(
        callable $callback,
        string $successMessage,
        string $successRoute,
        string $errorContext,
        array $errorData = []
    ): RedirectResponse {
        try {
            return DB::transaction(function () use ($callback, $successMessage, $successRoute) {
                $callback();
                
                return redirect()->route($successRoute)
                    ->with('success', $successMessage);
            });
        } catch (\Exception $e) {
            Log::error($errorContext, array_merge($errorData, ['error' => $e->getMessage()]));
            
            return redirect()->back()
                ->withInput()
                ->with('error', $this->getGenericErrorMessage());
        }
    }

    /**
     * Get the generic error message for failed operations.
     *
     * @return string
     */
    protected function getGenericErrorMessage(): string
    {
        return 'An error occurred. Please try again.';
    }

    /**
     * Execute a database transaction for delete operations.
     *
     * @param callable $callback The delete logic
     * @param string $resourceName The name of the resource being deleted
     * @param string $successRoute The route to redirect on success
     * @param array $errorData Additional data for error logging
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function handleDelete(
        callable $callback,
        string $resourceName,
        string $successRoute,
        array $errorData = []
    ): RedirectResponse {
        return $this->handleTransaction(
            $callback,
            ucfirst($resourceName) . ' deleted successfully.',
            $successRoute,
            ucfirst($resourceName) . ' deletion failed',
            $errorData
        );
    }

    /**
     * Execute a database transaction for create operations.
     *
     * @param callable $callback The create logic
     * @param string $resourceName The name of the resource being created
     * @param string $successRoute The route to redirect on success
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function handleCreate(
        callable $callback,
        string $resourceName,
        string $successRoute
    ): RedirectResponse {
        return $this->handleTransaction(
            $callback,
            ucfirst($resourceName) . ' created successfully.',
            $successRoute,
            ucfirst($resourceName) . ' creation failed'
        );
    }

    /**
     * Execute a database transaction for update operations.
     *
     * @param callable $callback The update logic
     * @param string $resourceName The name of the resource being updated
     * @param string $successRoute The route to redirect on success
     * @param array $errorData Additional data for error logging
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function handleUpdate(
        callable $callback,
        string $resourceName,
        string $successRoute,
        array $errorData = []
    ): RedirectResponse {
        return $this->handleTransaction(
            $callback,
            ucfirst($resourceName) . ' updated successfully.',
            $successRoute,
            ucfirst($resourceName) . ' update failed',
            $errorData
        );
    }
}
