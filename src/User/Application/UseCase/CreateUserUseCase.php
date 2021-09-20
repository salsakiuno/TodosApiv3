<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\Entity\User;
use Symfony\Component\Form\FormFactoryInterface;
use App\User\Application\Request\CreateUserRequest;
use App\User\Application\Response\CreateUserResponse;
use App\User\Application\Exception\ValidationException;
use App\User\Application\Form\CreateUserForm;
use Psr\Log\LoggerInterface;
class CreateUserUseCase
{
    private $formFactory;

    public function __construct(UserRepositoryInterface $userRepositoryInterface, FormFactoryInterface $formFactory)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->formFactory = $formFactory;
    }

    public function create(CreateUserRequest $request)
    {
         try {
            $this->validateForm($request);
            $user = new User(
                $request->getUserName(),
                $request->getEmail()
            );
    
            $this->userRepositoryInterface->save($user);
            $userId = $this->userRepositoryInterface->findByEmail($request->getEmail());
            $return = new CreateUserResponse($userId->id, $request->getUserName());

            return $return;
        } catch(ValidationException $error) {
            throw $error;
         }
    }

    public function validateForm(CreateUserRequest $request)
    {
        $form = $this->formFactory->create(CreateUserForm::class);

        $form->submit([
            'email' => $request->getEmail(),
            'userName' => $request->getUserName()
        ]);

        if(!($form->isValid() && $form->isSubmitted()))
        {
            $errorsList = $form->getErrors(true);
            if(!empty($errorsList)){
                foreach($errorsList as $error){
                    $errors[] = $error->getMessage();
                }
                var_dump($errors);
                throw new ValidationException($errors);
         }
       }
    }
}
