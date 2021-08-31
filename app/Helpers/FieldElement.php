<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Models\AuxList;

/**
 *
 */
class FieldElement
{
    protected string $name;
    protected string $label;
    protected string $type;
    protected ?string $defaultValue;
    protected bool $required;
    protected int $len;
    protected ?string $typeList;

    /**
     * @param string $name
     * @return FieldElement
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $label
     * @return FieldElement
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @param string $type
     * @return FieldElement
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string|null $typeList
     * @return $this
     */
    public function setTypeList(?string $typeList): self
    {
        $this->typeList = $typeList;

        return $this;
    }

    /**
     * @param string|null $defaultValue
     * @return FieldElement
     */
    public function setDefaultValue(?string $defaultValue): self
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * @param bool $required
     * @return FieldElement
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * @param int $len
     * @return FieldElement
     */
    public function setLen(int $len): self
    {
        $this->len = $len;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return ($this->required ? '<span class="text-red">*</span>' : '') . $this->label . ':';
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @return int
     */
    public function getLen(): int
    {
        return $this->len;
    }

    /**
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        $r = [];
        if ($this->type === 'enum') {
            $r = (new AuxList())::getAuxList($this->typeList, '');
        }

        return $r;
    }
}
