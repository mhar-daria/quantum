<?php

namespace cf47\theme\realtyspace\module\property\submit;

use cf47\plugin\realtyspace\module\property\Entity;
use cf47\plugin\realtyspace\module\property\Manager;
use cf47\plugin\realtyspace\module\property\Repository as PropertyRepo;
use cf47\themecore\Ajax as AjaxBuilder;
use cf47\themecore\FileUploader;
use cf47\themecore\helper\JsonResponse;
use cf47\themecore\user\Repository as UserRepo;
use Respect\Validation\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class AjaxListener
{
    /**
     * @var AjaxBuilder
     */
    private $ajax;
    /**
     * @var PropertyRepo
     */
    private $property_repo;
    /**
     * @var UserRepo
     */
    private $user_repo;
    /**
     * @var Manager
     */
    private $manager;
    /**
     * @var FileUploader
     */
    private $file_uploader;

    /**
     * Ajax constructor.
     *
     * @param AjaxBuilder $ajax
     * @param PropertyRepo $property_repo
     * @param UserRepo $user_repo
     * @param Manager $manager
     * @param FileUploader $file_uploader
     */
    public function __construct(
        AjaxBuilder $ajax,
        PropertyRepo $property_repo,
        UserRepo $user_repo,
        Manager $manager,
        FileUploader $file_uploader
    ) {
        $this->ajax = $ajax;
        $this->property_repo = $property_repo;
        $this->user_repo = $user_repo;
        $this->manager = $manager;
        $this->file_uploader = $file_uploader;
    }

    public function register()
    {
        $user_repo = $this->user_repo;
        $property_repo = $this->property_repo;
        $property_manager = $this->manager;
        $this->ajax->add_private_listener(
            'frontSubmitDeleteProperty',
            function (Request $request) use ($user_repo, $property_repo, $property_manager) {
                $id = $request->request->get('id');
                Validator::positive()->assert($id);

                $user = $user_repo->find_current_or_throw();
                /** @var Entity $property */
                $property = $property_repo->find_one_by_id_or_throw($id);

                if (!$property->belongs_to_author($user)) {
                    return false;
                }

                $property_manager->remove($property);

                return new JsonResponse([
                    'message' => esc_html__('The property has been successfully removed', 'realtyspace')
                ]);
            }
        );

        $this->ajax->add_private_listener(
            'frontSubmitHideProperty',
            function (Request $request) use ($user_repo, $property_repo, $property_manager) {
                $id = $request->request->get('id');
                Validator::positive()->assert($id);

                $user = $user_repo->find_current_or_throw();
                /** @var Entity $property */
                $property = $property_repo->find_one_by_id_or_throw($id);

                if (!$property->has_published_status()) {
                    return false;
                }

                if (!$property->belongs_to_author($user)) {
                    return false;
                }

                $property_manager->transition_status($property, 'private');

                return new JsonResponse([
                    'message' => esc_html__('The post status was successfully changed', 'realtyspace'),
                    'label' => esc_html__('Hidden', 'realtyspace'),
                ]);
            }
        );

        $this->ajax->add_private_listener(
            'frontSubmitShowProperty',
            function (Request $request) use ($user_repo, $property_repo, $property_manager) {
                $id = $request->request->get('id');

                Validator::positive()->assert($id);

                $user = $user_repo->find_current_or_throw();
                /** @var Entity $property */
                $property = $property_repo->find_one_by_id_or_throw($id);

                if (!$property->has_private_status()) {
                    return false;
                }

                if (!$property->belongs_to_author($user)) {
                    return false;
                }

                $property_manager->transition_status($property, 'publish');

                return new JsonResponse([
                    'message' => esc_html__('The property status was successfully changed', 'realtyspace'),
                    'label' => esc_html__('Published', 'realtyspace'),
                ]);
            }
        );

        $file_uploader = $this->file_uploader;

        $this->ajax->add_private_listener(
            'frontSubmitImage',
            function (Request $request) use ($file_uploader) {
                /** @var UploadedFile $file */
                $file = $request->files->get('file');

                Validator::not(Validator::nullType())->assert($file);

                if (!$file->isValid()) {
                    cf47_errlog($file->getErrorMessage());

                    return false;
                }

                $attachment_id = $file_uploader->upload('file');

                return new JsonResponse([
                    'id' => $attachment_id,
                    'isImage' => true,
                ]);
            }
        );

        $this->ajax->add_private_listener(
            'frontSubmitAttachment',
            function (Request $request) use ($file_uploader) {
                /** @var UploadedFile $file */
                $file = $request->files->get('file');

                Validator::not(Validator::nullType())->assert($file);

                if (!$file->isValid()) {
                    cf47_errlog($file->getErrorMessage());

                    return false;
                }

                $attachment_id = $file_uploader->upload('file');

                return new JsonResponse([
                    'id' => $attachment_id,
                    'isImage' => wp_attachment_is_image($attachment_id),
                ]);
            }
        );

    }
}
